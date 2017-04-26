{{-- resources/views/emails/password.blade.php --}}

<section >
     <table width="100%" cellpadding="0" cellspacing="0" style="width: 100%; margin: 0;  padding: 0;  -premailer-width: 100%;  -premailer-cellpadding: 0;  -premailer-cellspacing: 0;  background-color: #F2F4F6;">
      <tr>
        <td align="center">
          <table  width="100%" cellpadding="0" cellspacing="0" style=" width: 100%; margin: 0;  padding: 0;  -premailer-width: 100%;  -premailer-cellpadding: 0;  -premailer-cellspacing: 0;">

            <tr>
              <td  style="padding: 25px 0; text-align: center;">
                <img src="http://i68.tinypic.com/1el0ub.jpg" style="width: 10%; text-align: center;" alt="Logo">
                <br>
                <hr style=" border: 1px solid #F15C22; border-radius: 100px ;   height: 0px;   text-align: center;">
                <!--
                <p class="email-masthead_name" style=" font-size: 12px; font-weight: bold;  color: #bbbfc3;  text-decoration: none;  text-shadow: 0 1px 0 white;">
                Bien
                </p>
                -->
              </td>
            </tr>
            <tr>
              <td  width="100%" cellpadding="0" cellspacing="0" style="width: 100%; margin: 0;  padding: 0;  -premailer-width: 100%;  -premailer-cellpadding: 0;  -premailer-cellspacing: 0;  border-top: 1px solid #EDEFF2;  border-bottom: 1px solid #EDEFF2;  background-color: #FFFFFF;">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="width: 570px; margin: 0 auto; padding: 0; -premailer-width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; background-color: #FFFFFF;">
                  <tr>
                      <td style="padding: 35px;">
                        <h1 style="margin-top: 0; color: #2F3133;  font-size: 19px;  font-weight: bold;  text-align: left;">{{ trans('correolang.title') }}</h1>
                        <p style="margin-top: 0; color: #74787E; line-height: 1.5em; font-size: 12px; text-align: left;">{{ trans('correolang.message_one') }} <strong>{{ trans('correolang.message_two') }}</strong></p>

                        <table align="center" width="100%" cellpadding="0" cellspacing="0"
                        style="width: 100%; margin: 30px auto;  padding: 0;  -premailer-width: 100%;  -premailer-cellpadding: 0;  -premailer-cellspacing: 0;  text-align: center;">
                          <tr>
                            <td align="center">
                              <!-- Border based button
                         https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design -->
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>

                                          <a href="{{ url('password/reset/'.$token) }}" style="background-color: #3869D4;
                                          border-top: 10px solid #3869D4;
                                          border-right: 18px solid #3869D4;
                                          border-bottom: 10px solid #3869D4;
                                          border-left: 18px solid #3869D4;
                                          display: inline-block;
                                          color: #FFF;
                                          text-decoration: none;
                                          border-radius: 3px;
                                          box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                                          -webkit-text-size-adjust: none;

                                          background-color: #22BC66;
                                          border-top: 10px solid #22BC66;
                                          border-right: 18px solid #22BC66;
                                          border-bottom: 10px solid #22BC66;
                                          border-left: 18px solid #22BC66;"
                                          >{{ trans('correolang.message_passwordreset') }}</a>

                                          <!--<a href="{{ url('password/reset/'.$token) }}" >{{ url('password/reset/'.$token) }}Reset your password</a>-->
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>

                        <p style="margin-top: 0;
                                  color: #74787E;
                                  line-height: 1.5em;
                                  text-align: left;
                                  font-size: 12px;
                                  text-align: left;">{{ trans('correolang.message_three') }}</p>

                        <p style="margin-top: 0;
                                  color: #74787E;
                                  line-height: 1.5em;
                                  text-align: left;
                                  font-size: 12px;
                                  text-align: left;">{{ trans('correolang.message_four') }}

                        <br>{{ trans('correolang.message_empresa') }}</p>
                        <table style="margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;">
                          <tr>
                            <td>
                              <p style="margin-top: 0;
                                  color: #74787E;
                                  line-height: 1.5em;
                                  text-align: left;
                                  font-size: 12px;">{{ trans('correolang.message_five') }}</p>
                              <p style="font-size: 12px;">
                              <a href="{{ url('password/reset/'.$token) }}">{{ url('password/reset/'.$token) }}</a></p>
                            </td>
                          </tr>
                        </table>

                      </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table align="center" width="570" cellpadding="0" cellspacing="0" style="width: 570px; margin: 0 auto; padding: 0; -premailer-width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; text-align: center;">
                  <tr>
                    <td align="center" style="padding: 35px;">
                      <p style="margin-top: 0;
                          color: #74787E;
                          font-size: 12px;
                          line-height: 1.5em;
                          text-align: center;">&copy; 2017 {{ trans('correolang.message_empresa') }}. {{ trans('correolang.message_nine') }}.</p>
                      <p  style="margin-top: 0;
                          color: #74787E;
                          font-size: 12px;
                          line-height: 1.5em;
                          text-align: center;">
                        {{ trans('correolang.message_six') }}
                        <br>{{ trans('correolang.message_seven') }}
                        <br>{{ trans('correolang.message_eight') }}
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
     </table>
   </section>
