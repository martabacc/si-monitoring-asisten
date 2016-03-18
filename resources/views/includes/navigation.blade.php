<!--Navigation-->
 <div class="navbar-fixed" >
    <nav id="nav_f" class="default_color" role="navigation" id='id-navbar'>
        <div class="container">
            <div class="nav-wrapper">
            <a href="{{ url() }}" id="logo-container" class="brand-logo">Spectacle Design</a>
                <ul class="right hide-on-med-and-down">
                    <li ><a href="{{ url('portofolio')}}">Portofolio</a></li>
                    <li ><a href="{{ url('testimonial')}}">Testimonial</a></li>
                    <li ><a href="{{ url('about')}}">Tentang Kami</a></li>
                    <li><a href="{{ url('order')}}" class="btn blue lighten-2">Pesan sekarang!</a></li>
                    <li><a class="modal-trigger btn blue lighten-2" href="#modal1">Log In</a>
                    </li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li ><a href="{{ url('portofolio')}}">Portofolio</a></li>
                    <li ><a href="{{ url('testimonial')}}">Testimonial</a></li>
                    <li ><a href="{{ url('about')}}">Tentang Kami</a></li>
                    <li ><a href="{{ url('order')}}"><strong>Pesan Sekarang! </strong></a></li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>
<div id="modal1" class="modal s12 m6 l6">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
        <div class="input-field">
          <i class='material-icons prefix'>account_circle</i>
          <input name="email" type="email" class="validate">
          <label>Email</label>
        </div>
        <div class="input-field">
          <i class='material-icons prefix'>vpn_key</i>
          <input name="password" type="password">
          <label>Password</label>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
