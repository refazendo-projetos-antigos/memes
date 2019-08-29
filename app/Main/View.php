<?php

namespace App\Main;

use Error;

class View
{
  private $content = '';
  private $viewsDir = '/../../sources/views';
  private $templateDir = 'layouts';
  private $template = 'master';
  private $data = [];
  private $contents = [];
  private $metas = [];
  private $files = [];

  public function __construct(string $path)
  {
    $path = str_replace('.', '/', $path);
    $path = __DIR__ . "{$this->viewsDir}/{$path}.php";
    if(!file_exists($path)) {
      throw new Error('View not found.');
    }
    $this->content = $path;
    $class = pathinfo(debug_backtrace()[1]['file'])['filename'];
    $class = "App\\Controllers\\{$class}";
    $this->template = isset(get_class_vars($class)['template'])? get_class_vars($class)['template']: $this->template;
    return $this;
  }

  public function template(string $template)
  {
    $this->template = $template;
    return $this;
  }

  public function metas(string $content)
  {
    $this->metas[] = $content;
    return $this;
  }

  public function css(string $file)
  {
    $this->files['css'][] = $file;
    return $this;
  }

  public function js(string $file)
  {
    $this->files['js'][] = $file;
    return $this;
  }

  public function with(string $name, $value)
  {
    $this->data[$name] = $value;
    return $this;
  }

  public function run()
  {
    $this->template = __DIR__ . "{$this->viewsDir}/{$this->templateDir}/{$this->template}/template.php";
    ob_start();
    extract($this->data);
    include $this->template;
    $this->content = ob_get_clean();
    $this->content = $this->searchTtemplateTags();
    if(getenv('MINIFY_HTML')=='true') {
      $this->content = preg_replace('/<!--([^\[|(<!)].*)/', '', $this->content);
			$this->content = preg_replace('/(?<!\S)\/\/\s*[^\r\n]*/', '', $this->content);
			// Clean Whitespace
			$this->content = preg_replace('/\s{2,}/', '', $this->content);
			$this->content = preg_replace('/(\r?\n)/', '', $this->content);
    }
    return $this->content;
  }

  protected function searchTtemplateTags()
  {
    if(preg_match_all('/\@content\((\'|\")([a-zA-Z0-9\_]+)(\'|\")\)(.*)\@endcontent/Us', $this->content, $matches)) {
      foreach($matches[4] as $index => $content) {
        $type = $matches[2][$index];
        $this->content = str_replace($matches[0][$index], '', $this->content);
        if($type=='css') {
          $this->content = str_replace('</head>', "\n{$content}\n</head>", $this->content);
        }
        if($type=='js') {
          $this->content = str_replace('</body>', "\n{$content}\n</body>", $this->content);
        }
      }
    }
    return $this->content;
  }

}
