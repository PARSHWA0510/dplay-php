
// For Firebase JS SDK v7.20.0 and later, measurementId is optional

const firebaseConfig = {
  apiKey: "AIzaSyAzSYuS88I2z06iWfzydb2-n_UYtIs8Crs",
  authDomain: "dplay-admin.firebaseapp.com",
  projectId: "dplay-admin",
  storageBucket: "dplay-admin.firebasestorage.app",
  messagingSenderId: "429334097315",
  appId: "1:429334097315:web:18bc1be02e9d54db023e16",
  measurementId: "G-W36LZVFHH7"
};

// initializing firebase SDK
firebase.initializeApp(firebaseConfig);

// render recaptcha verifier
render();
function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}

// function for send OTP
function sendOTP() {
    var number = document.getElementById('number').value;
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        document.querySelector('.number-input').style.display = 'none';
        document.querySelector('.verification').style.display = '';
    }).catch(function (error) {
        // error in sending OTP
        alert(error.message);
    });
}

// function for OTP verify
function verifyCode() {
    var code = document.getElementById('verificationCode').value;
    coderesult.confirm(code).then(function () {
        document.querySelector('.verification').style.display = 'none';
        document.querySelector('.result').style.display = '';
        document.querySelector('.correct').style.display = '';
        console.log('OTP Verified');
    }).catch(function () {
        document.querySelector('.verification').style.display = 'none';
        document.querySelector('.result').style.display = '';
        document.querySelector('.incorrect').style.display = '';
        console.log('OTP Not correct');
    })
}
