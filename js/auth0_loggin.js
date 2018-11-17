window.addEventListener('load', function() {
  var userProfile;

  var webAuth = new auth0.WebAuth({
    domain: 'moy-fbpw.auth0.com',
    clientID: '6fyJBEpvWi8MILCWMUIaEy3WS9EfP96H',
    responseType: 'token id_token',
    scope: 'openid profile',
    redirectUri: window.location.href,
    leeway: 60
  });

  var loginView = document.getElementById('login-view');

  //var profileView = document.getElementById('profile-view');

  // buttons and event listeners
  var loginBtn = document.getElementById('qsLoginBtn');
  var logoutBtn = document.getElementById('qsLogoutBtn');
  //var dropdownMenuButton = document.getElementById('dropdownMenuButton');

  var profileViewBtn = document.getElementById('btn-profile-view');

  profileViewBtn.addEventListener('click', function() {
    //profileView.style.display = 'inline-block';
    getProfile();
  });

  loginBtn.addEventListener('click', function(e) {
    e.preventDefault();
    webAuth.authorize();
  });

  logoutBtn.addEventListener('click', logout);

  function setSession(authResult) {
    // Set the time that the access token will expire at
    var expiresAt = JSON.stringify(
      authResult.expiresIn * 1000 + new Date().getTime()
    );
    localStorage.setItem('access_token', authResult.accessToken);
    localStorage.setItem('id_token', authResult.idToken);
    localStorage.setItem('expires_at', expiresAt);
  }

  function logout() {
    // Remove tokens and expiry time from localStorage
    localStorage.removeItem('access_token');
    localStorage.removeItem('id_token');
    localStorage.removeItem('expires_at');
    displayButtons();
  }

  function isAuthenticated() {
    // Check whether the current time is past the
    // access token's expiry time
    var expiresAt = JSON.parse(localStorage.getItem('expires_at'));
    return new Date().getTime() < expiresAt;
  }

  function displayButtons() {
    if (isAuthenticated()) {
      loginBtn.style.display = 'none';
      logoutBtn.style.display = 'inline-block';
      getProfile();
      profileViewBtn.style.display = 'inline-block';
    } else {
      loginBtn.style.display = 'inline-block';
      logoutBtn.style.display = 'none';
      profileViewBtn.style.display = 'none';
      //profileView.style.display = 'none';
      $("#user_img").attr('src', 'view/img/usuarios/default/anonymous.png');
      $("#user_img_nav").attr('src', 'view/img/usuarios/default/anonymous.png');
      $("#user_name_nav").html('Usuario');
      $("#user_img_side").attr('src', 'view/img/usuarios/default/anonymous.png');
      $("#user_name_side").html('Usuario');
      $("#user_name_dropdown").html('Usuario<small>Miembro</small>');
      //dropdownMenuButton.innerHTML = '<img src="view/img/usuarios/default/anonymous.png" class="user-image" alt="user-image"><span class="hidden-xs">Usuario Administrador</span>';
    }
  }

  function getProfile() {
    if (!userProfile) {
      var accessToken = localStorage.getItem('access_token');

      if (!accessToken) {
        console.log('Access token must exist to fetch profile');
      }

      webAuth.client.userInfo(accessToken, function(err, profile) {
        if (profile) {
          userProfile = profile;
          displayProfile();
        }
      });
    } else {
      displayProfile();
    }
  }

  function displayProfile() {
    //document.querySelector('#profile-view h3').innerHTML = userProfile.name;
    //document.querySelector('#profile-view img').src = userProfile.picture;
    $("#user_img").attr('src', userProfile.picture);
    $("#user_img_nav").attr('src', userProfile.picture);
    $("#user_name_nav").html(userProfile.name);
    $("#user_img_side").attr('src', userProfile.picture);
    $("#user_name_side").html(userProfile.name);
    $("#user_name_dropdown").html(userProfile.name + '<small>Miembro</small>');
    //dropdownMenuButton.innerHTML = "<img src='" + userProfile.picture + "'  class='user-image' alt='User profile picture'><span class='hidden-xs'>"+ userProfile.name + "</span>";

    //document.querySelector('#profile-view .nickname').innerHTML = userProfile.nickname;

    // display the profile
    //document.querySelector('#profile-view .full-profile').innerHTML = JSON.stringify(userProfile, null, 2);

    //console.log(userProfile);
    //console.log(userProfile.valueOf());
  }

  function handleAuthentication() {
    webAuth.parseHash(function(err, authResult) {
      if (authResult && authResult.accessToken && authResult.idToken) {
        window.location.hash = '';
        setSession(authResult);
        loginBtn.style.display = 'none';
      } else if (err) {
        console.log(err);
        alert(
          'Error: ' + err.error + '. Check the console for further details.'
        );
      }
      displayButtons();
    });
  }

  handleAuthentication();
});