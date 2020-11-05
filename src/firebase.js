import firebase from "firebase/app";
import "firebase/firestore";

// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAeIOp8-1hVLHq7ULexZ3PALXD2jrM3kC4",
  authDomain: "myfirstproject-3b8d9.firebaseapp.com",
  databaseURL: "https://myfirstproject-3b8d9.firebaseio.com",
  projectId: "myfirstproject-3b8d9",
  storageBucket: "myfirstproject-3b8d9.appspot.com",
  messagingSenderId: "80368543987",
  appId: "1:80368543987:web:132f77a8ea88299951af86",
};

firebase.initializeApp(firebaseConfig);

export default firebase;
