<template>
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form class="login" @submit.prevent="login">
                <div class="callout callout-danger" v-if="message != ''">
                    <h4>Fail!</h4>

                    <p>{{ message }}</p>
                </div>

                <div class="form-group has-feedback">
                    <input type="email" class="form-control" v-model="email" placeholder="Email" required/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" v-model="password" placeholder="Password" required/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>
              </div -->
                    <!-- /.col -->
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" :disabled="loginprocess == 1">
                        <font v-if="loginprocess == 1">
                            <i class="fa fa-spinner fa-spin"></i>  Proses Login ....
                        </font>
                        <font v-else-if="loginprocess == 0">
                            Login
                        </font>
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <!-- a href="#">I forgot my password</a><br -->
            <router-link to="/forgot-password" class="text-center">I forgot my password</router-link> <br />
            <!-- a href="register.html" class="text-center">Register a new membership</a -->
            <router-link to="/auth/register" class="text-center">Register a new membership</router-link> <br />
            <router-link to="/mustloggedin" class="text-center">Wajib login</router-link>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</template>


<script>
export default {
    data() {
      return {
        email: '',
        password: '',
        message : '',
        errors : '',
        loginprocess : 0
      }
    },
    methods: {
      login: function() {
        this.message = '';
        this.loginprocess = 1;
        let email = this.email;
        let password = this.password;
        this.$store
          .dispatch('login', {email,password} )
          .then( (res) => {
              this.loginprocess = 0;
              this.$router.push('/')
          })
          .catch( (err) => {
              this.loginprocess = 0;
              var message = err.response.data.message
              var errors = err.response.data.errors

              if( typeof message != 'undefined' ) {
                  this.message = message
              }
          } );
      }
    },
    mounted() {
        console.log('Login loaded')
    },
}
</script>