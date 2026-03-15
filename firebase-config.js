// ----------------------------------------------------
// FIREBASE CONFIGURATION
// ----------------------------------------------------
// REEMPLAZA ESTO CON LOS DATOS DE TU PROYECTO FIREBASE
// Ve a consola.firebase.google.com -> Web App -> Settings
const firebaseConfig = {
    apiKey: "AIzaSy_TU_LLAVE_AQUI_XXXXXX",
    authDomain: "tu-proyecto.firebaseapp.com",
    projectId: "tu-proyecto",
    storageBucket: "tu-proyecto.appspot.com",
    messagingSenderId: "123456789",
    appId: "1:123456:web:abcd1234"
};

let app, auth, db;

try {
    // Initialize Firebase
    if (!firebase.apps.length) {
        app = firebase.initializeApp(firebaseConfig);
    } else {
        app = firebase.app(); // if already initialized
    }
    
    // Auth & Firestore instances
    auth = firebase.auth();
    db = firebase.firestore();
} catch (e) {
    console.warn("Firebase no ha sido configurado correctamente aún con las credenciales reales.");
}

// ----------------------------------------------------
// REGISTRATION FUNCTION
// ----------------------------------------------------
/**
 * Crea el usuario usando Firebase Auth y guarda su info (Suscripción y Nequi) en Firestore
 */
async function createNetflixAccount(email, password, plan, price) {
    // SECURITY FALLBACK: If keys are default dummy keys, bypass the actual backend call 
    // so the frontend works for demonstration purposes without crashing.
    if (firebaseConfig.apiKey.includes('TU_LLAVE') || !auth) {
        console.warn("Simulando creación de cuenta por falta de credenciales reales...");
        return new Promise(resolve => setTimeout(resolve, 1500));
    }

    try {
        // 1. Register with Firebase Auth
        const userCredential = await auth.createUserWithEmailAndPassword(email, password);
        const user = userCredential.user;

        // 2. Save Subscription Data to Firestore Database
        await db.collection('users').doc(user.uid).set({
            email: email,
            subscription: {
                paymentMethod: 'Nequi',
                status: 'pending_payment',
                plan: plan,
                price: price,
            },
            createdAt: firebase.firestore.FieldValue.serverTimestamp()
        });

        return user;
    } catch (error) {
        console.error("Error creating account:", error);
        throw error;
    }
}
