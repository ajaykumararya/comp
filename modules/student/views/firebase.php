<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyBxjim-_23UyfFVWc41vuzQ-8uOiRKQVDg",
    authDomain: "ajay-9ced3.firebaseapp.com",
    databaseURL: "https://ajay-9ced3-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "ajay-9ced3",
    storageBucket: "ajay-9ced3.appspot.com",
    messagingSenderId: "201273699530",
    appId: "1:201273699530:web:eca010ab0d2692a2141833",
    measurementId: "G-TMZC0JBE2Z"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
  console.log(app);
</script>