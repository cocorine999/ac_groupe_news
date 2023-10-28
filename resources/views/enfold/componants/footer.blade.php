<div class="container row">
  <div class="footer-widgets-wrap">

    <div class="footer common-widget section" id="footer-sec1" name="Section (Left)">

      <div class="widget HTML" data-version="2" id="HTML4">
        <div class="widget-title">
          <h3 class="title">
            Contacter nous
          </h3>
        </div>
        <div class="widget-content">
          <div class="widget ContactForm" data-version="1" id="ContactForm1">
            <h2 class="title">Contacter nous</h2>
            <div class="contact-form-widget">
              <div class="form">
                <form action="{{route('contact')}}" method="POST" name="contact-form">
                  @csrf
                  <style type="text/css">
                    .before-text {
                      font-size: 12.6px;
                      font-family: 'Noto Sans', Helvetica, Arial, sans-serif;
                      line-height: 1.4em;
                      margin: 0 0 5px 0;
                      display: block;
                      padding: 0 5px;
                      color: #fff;
                    }
                  </style>
                  <span class="before-text">Nom & Prenom</span>
                  <input class="contact-form-name" id="ContactForm1_contact-form-name" name="name" size="30" type="text" value="">
                  <span class="before-text">Email <span style="font-weight: bolder;">*</span></span>

                  <input class="contact-form-email" id="ContactForm1_contact-form-email" name="email" size="30" type="text" value="">
                  <span class="before-text">Message <span style="font-weight: bolder;">*</span></span>
                  <textarea class="contact-form-email-message" cols="25" id="ContactForm1_contact-form-email-message" name="message" rows="5"></textarea>
                  <p></p>
                  <input class="contact-form-button contact-form-button-submit" id="ContactForm1_contact-form-submit" type="submit" value="Envoyer">
                  <p></p>
                  <div style="text-align: center; max-width: 222px; width: 100%">
                    <p class="contact-form-error-message" id="ContactForm1_contact-form-error-message"></p>
                    <p class="contact-form-success-message" id="ContactForm1_contact-form-success-message">
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="footer common-widget section" id="footer-sec2" name="Section (Center)">
      <div class="widget HTML" data-version="2" id="HTML7">
        <div class="widget-title">
          <h3 class="title">
            Archive
          </h3>
        </div>
        <div class="widget-content">
          <div id="ArchiveList">
            <div id="BlogArchive1_ArchiveList">
              <select id="BlogArchive1_ArchiveMenu">
                <option value="">Archive</option>
                <option value="http://robin-templatesyard.blogspot.com/2015/12/">December (18)</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="widget HTML FollowByEmail" data-version="2" id="HTML7 FollowByEmail1">
        <div class="widget-title">
          <h3 class="title">
            Newsletter
          </h3>

        </div>
        <div class="widget-content ">
          <span class="before-text"> Abonnez-vous à la newsletter et recevez gratuitement l'info en
            continue.!</span>
          <div class="follow-by-email-inner">
            <form action="{{route('newsletter')}}" method="POST">
              @csrf
              <input autocomplete="off" class="follow-by-email-address" name="email" placeholder="Entrez votre adresse email" type="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <input class="follow-by-email-submit news" type="submit" value="S'abonner">
              <style type="text/css">
                .news .footer .BlogSearch .search-action:hover,
                .footer .FollowByEmail .follow-by-email-inner .follow-by-email-submit:hover,
                .footer .contact-form-button-submit:hover {
                  background-color: rgba(255, 255, 255, 0.05);
                  border: 1px solid rgba(255, 255, 255, 0.05);

                  color: #cc0a0a;
                }
              </style>
            </form>
          </div>
        </div>
      </div>

    </div>

    <div class="footer common-widget section" id="footer-sec3" name="Section (Right)">
      <div class="widget PopularPosts lowerbar ty-trigger section" data-version="2" id="PopularPosts2">
        <div class="widget-title">
          <h3 class="title">
            À propos
          </h3>
        </div>
        <div class="widget-content">
          <style>
            .avatar {
              float: left;
            }

            .avatar-85 {
              border: 3px solid #fff;
              border-radius: 85px;
              margin-right: 10px;
            }

            .icons-social {
              margin: 0 auto;
              clear: both;
              float: none;
            }

            .icons-social li {
              display: inline;
              padding: 0;
              float: left;
            }

            .icons-social #social a {
              display: block;
              height: 42px;
              width: 42px;
              margin-right: 5.5px;
              color: #fff;
              text-align: center;
              font-size: 20px;
            }

            .icons-social #social a:before {
              display: inline-block;
              font: normal normal normal 22px/1 FontAwesome;
              font-size: inherit;
              font-style: normal;
              font-weight: 400;
              line-height: 42px;
              -webkit-font-smoothing: antialiased;
              -moz-osx-font-smoothing: grayscale;
            }

            ù .icons-social .facebook:before {
              content: "\f09a";
            }

            .icons-social .twitter:before {
              content: "\f099";
            }

            .icons-social .gplus:before {
              content: "\f0d5";
            }

            .icons-social .linkedin:before {
              content: "\f0e1";
            }

            .icons-social .instagram:before {
              content: "\f16d";
            }

            .icons-social .pinterest:before {
              content: "\f0d2";
            }
          </style>
          <p><img alt="captain_jack_sparrow___vector" src="{{asset('enfold/images/captain_jack_sparrow___vector.png') }}" srcset="{{ asset('enfold/images/captain_jack_sparrow___vector.png') }}" class="avatar avatar-85 photo" title="captain_jack_sparrow___vector" width="85" height="85">

            <span class="before-text" style="font-size: 13px;"> Hello,
              my name is Jack Sparrow. I'm a 50 year old self-employed Pirate from the Caribbean. <br>

            </span>
            <a href="#" style="color: #0288d1; font-size: 13px;">Learn More →</a>
          </p>
        </div>
      </div>

      <div class="widget HTML" data-version="2" id="HTML3">
        <div class="widget-title">
          <h3 class="title">
            Média sociaux
          </h3>
        </div>
        <div class="widget-content">
          <ul class="social-counter social social-color">
            <li class="facebook">
              <a href="#" target="_blank" title="facebook"></a>
            </li>
            <li class="twitter">
              <a href="#" target="_blank" title="twitter"></a>
            </li>
            <li class="rss">
              <a href="#" target="_blank" title="rss"></a>
            </li>
            <li class="pinterest">
              <a href="#" target="_blank" title="pinterest"></a>
            </li>
            <li class="instagram">
              <a href="#" target="_blank" title="instagram"></a>
            </li>
            <li class="vk">
              <a href="#" target="_blank" title="vk"></a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </div>
  <div class="clearfix"></div>
  <div id="sub-footer-wrapper">
    <div class="container row">
      <div class="copyright-area">
        Crafted with
        <i aria-hidden="false" class="fa fa-heart" style="color: #111; margin: 0 2px;"></i>
        by
        <a href="#" id="mycontent" rel="dofollow" title="Free Blogger Templates" style="color: #111;">
          John Doe</a>
      </div>
    </div>
  </div>
</div>