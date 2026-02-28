import { useEffect, useState } from 'react';
import './App.css'; // On garde le style par défaut s'il existe

function App() {
  const [joueurs, setJoueurs] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    // RAPPEL : Remplace l'URL par la tienne (http://127.0.0.1:8000/api/joueurs ou ftf.test)
    fetch('http://ftf-digital.test/api/joueurs')
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur réseau ou API non trouvée');
        }
        return response.json();
      })
      .then(data => {
        console.log("Données reçues :", data); // Regarde la console F12 !
        // Laravel renvoie souvent { data: [...] }, donc on cible data.data
        setJoueurs(data.data || []); 
        setLoading(false);
      })
      .catch(err => {
        console.error(err);
        setError(err.message);
        setLoading(false);
      });
  }, []);

  return (
    <div style={{ padding: '20px', fontFamily: 'Arial' }}>
      <h1>⚽ Test de connexion FTF</h1>
      
      {loading && <p>Chargement des joueurs...</p>}
      
      {error && (
        <div style={{ color: 'red', border: '1px solid red', padding: '10px' }}>
          <strong>Erreur :</strong> {error}
          <br/>
          <small>Vérifie que Laravel tourne et que le CORS est activé.</small>
        </div>
      )}

      <div style={{ display: 'grid', gridTemplateColumns: 'repeat(3, 1fr)', gap: '10px' }}>
        {joueurs.map(joueur => (
          <div key={joueur.id} style={{ border: '1px solid #ddd', padding: '10px', borderRadius: '8px' }}>
            <h3>{joueur.nom_complet || joueur.nom}</h3>
            <p>Poste : {joueur.poste}</p>
            <p>Club : {joueur.club}</p>
          </div>
        ))}
      </div>

      {!loading && joueurs.length === 0 && !error && (
        <p>Aucun joueur trouvé dans la base de données.</p>
      )}
    </div>
  );
}

export default App;