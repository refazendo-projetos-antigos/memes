<div id="home-top">
  <div id="home-top-left">
    <nav id="home-top-left-menu">
      <div class="home-top-left-menu active">Texto</div>
      <div class="home-top-left-menu">Imagem</div>
    </nav>
    <div id="home-top-left-content">
      <div class="home-top-left-content active">
        <textarea id="home-top-left-content-textarea" placeholder="~le postagem"></textarea>
      </div>
      <div class="home-top-left-content">
        post a new image
      </div>
    </div>
  </div>
  <div id="home-top-right">
    <div id="home-top-right-items">
      <div class="home-top-right-arrows" data-type="prev">&ltrif;</div>
      <div id="home-top-right-items-center">
        <div class="home-top-right-item active" style="background-image:url('public/images/reactions/1.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/2.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/3.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/4.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/5.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/6.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/7.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/8.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/9.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/10.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/11.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/12.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/13.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/14.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/15.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/16.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/17.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/18.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/19.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/20.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/21.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/22.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/23.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/24.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/25.jpg')"></div>
        <div class="home-top-right-item" style="background-image:url('public/images/reactions/26.jpg')"></div>
      </div>
      <div class="home-top-right-arrows" data-type="next">&rtrif;</div>
    </div>
    <div id="home-top-right-memes">
      <label for="insert_meme" title="Inserir o meme na postagem">
        <input type="checkbox" name="insert_meme" id="insert_meme" /> Inserir um meme
      </label>
    </div>
    <div id="home-top-right-submit">
      <button type="submit">Postar</button>
    </div>
  </div>
</div>
<div id="home-posts">

  <div class="home-posts">
    <div class="home-posts-image">
      <div class="home-posts-image-before" style="background-image:url('public/images/users/68eac15d593541eb53c727a9a4a73e66.jpg');"></div>
      <div class="home-posts-image-after" style="background-image:url('public/images/users/68eac15d593541eb53c727a9a4a73e66.jpg');"></div>
    </div>
    <div class="home-posts-content">
      <a href="#">DERPINA</a>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam voluptas saepe pariatur fugiat nulla beatae officia. Commodi culpa voluptate, aut alias incidunt sunt repellat harum dolor, dolores itaque dolore illum.</p>
    </div>
  </div>

  <div class="home-posts">
    <div class="home-posts-image">
      <div class="home-posts-image-before" style="background-image:url('public/images/users/f7138e1164716c399ba932e863b0d6c2.jpg');"></div>
      <div class="home-posts-image-after" style="background-image:url('public/images/users/f7138e1164716c399ba932e863b0d6c2.jpg');"></div>
    </div>
    <div class="home-posts-content">
      <a href="#">Ted</a>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam voluptas saepe pariatur fugiat nulla beatae officia. Commodi culpa voluptate, aut alias incidunt sunt repellat harum dolor, dolores itaque dolore illum.</p>
    </div>
  </div>

  <div class="home-posts">
    <div class="home-posts-image">
      <div class="home-posts-image-before" style="background-image:url('public/images/users/derp.png');"></div>
      <div class="home-posts-image-after" style="background-image:url('public/images/users/derp.png');"></div>
    </div>
    <div class="home-posts-content">
      <a href="#">DERP</a>
      <p>hUr dur</p>
    </div>
  </div>

</div>

@content('js')
  <script>
  $(function(){
    const icons = $('.home-top-right-item');
    let iconsIndex = 0;
    const countIcons = icons.length;

    $('.home-top-right-arrows').on('click', function() {
      const type = this.dataset.type;
      if(type=='next') {
        iconsIndex = iconsIndex==countIcons-1? 0: iconsIndex+1;
      } else {
        iconsIndex = iconsIndex==0? countIcons-1: iconsIndex-1;
      }
      icons.removeClass('active').eq(iconsIndex).addClass('active');
    });

    // $('#template-conteudo-centro-new-centro-menu a').bind('click',function(){
    //   var $this = $(this),
    //   classe = 'template-conteudo-centro-new-centro-menu-sel',
    //   irmaos = $this.parent().children('a'),
    //   index = $this.index();

    //   irmaos.removeClass(classe);
    //   $this.addClass(classe);
    //   if($('#template-conteudo-centro-new-centro-cont li').eq(index).is(':hidden')){
    //     $('#template-conteudo-centro-new-centro-cont li').hide().eq(index).fadeIn(400);
    //   }
    // });


    // $('#template-conteudo-centro-new-lat-postar').bind('click',function(){
    //   var valor = $('#template-conteudo-centro-new-centro-cont textarea').val();

    //   $('<div/>',{
    //     'class' : 'clear template-conteudo-centro-postagens'
    //   })
    //   .append( $('<div/>',{'class':'template-conteudo-centro-postagens-img'}) )
    //   .append(
    //     $('<div/>',{'class':'template-conteudo-centro-postagens-cont'})
    //     .append( $('<a/>', {'html':'Tadeu Barbosa', 'href':'#'}) )
    //     .append( $('<div/>', {'html':valor}) )
    //   )
    //   .append(
    //     $('<div/>',{'class':'template-conteudo-centro-postagens-footer'})
    //   )
    //   .prependTo('#template-conteudo-centro-postagens');

    //   $('#template-conteudo-centro-new-centro-cont textarea').height(98).val('');
    // });

    // $('#template-conteudo-centro-new-centro-cont textarea').bind('keyup click blur keydown focusOut',function(){
    //   var valor = $(this).val().split(''),
    //   x = 0;

    //   for(var i=0; i<valor.length; i++){
    //     valor[i]=='\n' ? x++ : '';
    //   }

    //   if(x<5){
    //     x = 98;
    //   } else if(x>=5 && x<17){
    //     x = (x*10)+98;
    //   } else {
    //     x = 270;
    //   }

    //   $(this).height(x);

    // });

  });
  </script>
@endcontent
