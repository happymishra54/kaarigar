

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import './location-selector';
import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";

// 1. Grab your credentials from the .env file via Vite
const firebaseConfig = {
  apiKey: import.meta.env.VITE_FIREBASE_API_KEY,
  authDomain: import.meta.env.VITE_FIREBASE_AUTH_DOMAIN,
  projectId: import.meta.env.VITE_FIREBASE_PROJECT_ID,
  storageBucket: import.meta.env.VITE_FIREBASE_STORAGE_BUCKET,
  messagingSenderId: import.meta.env.VITE_FIREBASE_MESSAGING_SENDER_ID,
  appId: import.meta.env.VITE_FIREBASE_APP_ID
};

// 2. Initialize the Firebase Application
const app = initializeApp(firebaseConfig);

// 3. Initialize Firebase Authentication and export it for use in login forms
export const auth = getAuth(app);

document.addEventListener("DOMContentLoaded", () => {

  const reveals = document.querySelectorAll(
      ".reveal,.reveal-left,.reveal-right,.reveal-scale"
  );

  const observer = new IntersectionObserver(entries => {

      entries.forEach(entry => {

          if(entry.isIntersecting){

              entry.target.classList.add("active");

          }

      });

  },{
      threshold:.15
  });

  reveals.forEach(el => observer.observe(el));

});

/* ===========================
Mobile Side Menu
=========================== */

document.addEventListener("DOMContentLoaded",()=>{

    const hamburger=document.getElementById("hamburger");

    const close=document.getElementById("closeMenu");

    const menu=document.getElementById("sideMenu");

    const overlay=document.getElementById("overlay");

    function openMenu(){

        menu.classList.add("active");

        overlay.classList.add("active");

        document.body.style.overflow="hidden";

    }

    function closeMenu(){

        menu.classList.remove("active");

        overlay.classList.remove("active");

        document.body.style.overflow="";

    }

    hamburger?.addEventListener("click",openMenu);

    close?.addEventListener("click",closeMenu);

    overlay?.addEventListener("click",closeMenu);

});