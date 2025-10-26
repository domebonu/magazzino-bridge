README - Update Bridge (Render ⇄ Google Sheets)

Questo file permette di collegare il tuo sito Render a Google Apps Script evitando i blocchi CORS.
Le modifiche quantità nel magazzino verranno aggiornate direttamente nel tuo Google Sheets.

────────────────────────────
1️⃣ Upload su GitHub
────────────────────────────
- Apri il tuo repository 'magazzino-bridge'
- Clicca su 'Add file' → 'Upload files'
- Trascina dentro 'update.php'
- Clicca 'Commit changes'

────────────────────────────
2️⃣ Deploy su Render
────────────────────────────
- Vai su Render → progetto 'magazzino-bridge'
- Clicca 'Manual Deploy' → 'Deploy latest commit'

────────────────────────────
3️⃣ Modifica in magazzino_web.html
────────────────────────────
Nel file 'magazzino_web.html' trova la riga:

const updateURL = "https://script.google.com/macros/s/AKfycbydkAb5oBGLPXZYC9JZr5r3seN2tnlemosZKzT8jTr0nS-Z0g0RWCudFVLYnFjMdLAa/exec";

Sostituiscila con:

const updateURL = "https://magazzino-bridge.onrender.com/update.php";

────────────────────────────
4️⃣ Test finale
────────────────────────────
Apri la pagina:
https://magazzino-bridge.onrender.com/magazzino_web.html

Premi un tasto "+" o "-" nella colonna Quantità.
Dovresti vedere:
✅ “Quantità aggiornata con successo”

────────────────────────────
Backup
────────────────────────────
Il collegamento diretto Google Apps Script rimane disponibile per modifiche manuali
dal tuo foglio Google Sheets in caso di emergenza.
