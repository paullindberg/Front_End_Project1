<?php
include 'tables.php';
createTables();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- JQuery -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous"
    ></script>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css" />
    <title>Reddit-Lite</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-sm">
        <h1 class="page-name">reddit-lite</h1>
      </nav>
    </header>

    <section class="container-fluid">
      <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-sm-3">
          <form class="form-signin" login-input="form">
            <h3 class="form-signin-heading text-center">Sign In</h3>
            <br />
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                name="username"
                placeholder="Username"
                required
                autofocus
              />
            </div>
            <div class="form-group">
              <input
                type="password"
                class="form-control"
                name="password"
                placeholder="Password"
                required
              />
            </div>
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
              Sign In
            </button>
          </form>
        </section>
      </section>
    </section>

    <section class="container-fluid">
      <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-sm-3">
          <div class="panel panel-default">
            <div class="panel-body">
              <form class="form-signin" acc-creation="form">
                  <h3 class="form-signin-heading text-center">
                    Create Account
                  </h3>
                  <div class="form-group">
                    <!-- <label for="createUser">Username</label> -->
                    <input
                      class="form-control"
                      name="createUser"
                      id="createUser"
                      placeholder="Username"
                      autofocus
                      required
                    />
                    <br />
                    <!-- <label for="createPass">Password</label> -->
                    <input
                      class="form-control"
                      name="createPass"
                      id="createPass"
                      type="password"
                      placeholder="Password"
                      required
                    />
                    <br />
                    <!-- <label for="createName">Name</label> -->
                    <input
                      class="form-control"
                      name="createName"
                      id="createName"
                      placeholder="Name"
                    />
                    <br />
                    <!-- <label for="createEmail">Email</label> -->
                    <input
                      class="form-control"
                      name="createEmail"
                      id="createEmail"
                      type="email"
                      placeholder="Email"
                      required
                    />
                    <br />
                  </div>
                  <!-- <button type="submit" class="btn btn-default">
                  Create Account
                </button>
                <button type="reset" class="btn btn-default">Clear</button> -->
                  <button
                    type="submit"
                    class="btn btn-lg btn-primary btn-block"
                  >
                    Create Account
                  </button>
                  <button type="reset" class="btn btn-lg btn-primary btn-block">
                    Clear
                  </button>
                </form>
              </form>
            </div>
          </div>
        </section>
      </section>
    </section>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"
      charset="utf-8"
    ></script>
    <script src="scripts/formhandler.js" charset="utf-8"></script>
    <script src="scripts/datastore.js" charset="utf-8"></script>
    <script src="scripts/handler.js" charset="utf-8"></script>
    <script src="scripts/main.js" charset="utf-8"></script>
  </body>
</html>
