const express = require("express");
const app = express();
app.use(express.json());

app.get("/", (req, res) => {
     
  res.send(`
  <!DOCTYPE html>
  <html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Nike Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #111;
        color: #fff;
      }

      header {
        display: flex;
        justify-content: space-between;
        padding: 20px 40px;
        background: #000;
      }

      header h1 {
        color: #fff;
      }

      nav a {
        color: #fff;
        margin-left: 20px;
        text-decoration: none;
      }

      .hero {
        height: 90vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        background: url('https://images.unsplash.com/photo-1600180758890-6b94519a8ba6') no-repeat center/cover;
      }

      .hero h2 {
        font-size: 50px;
        margin: 0;
      }

      .hero p {
        margin: 20px 0;
      }

      .btn {
        background: #fff;
        color: #000;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
      }

      .products {
        display: flex;
        justify-content: space-around;
        padding: 50px;
      }

      .card {
        background: #222;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        width: 200px;
      }

      .card img {
        width: 100%;
        border-radius: 10px;
      }

      footer {
        text-align: center;
        padding: 20px;
        background: #000;
      }
    </style>
  </head>

  <body>

    <header>
      <h1>NIKE</h1>
      <nav>
        <a href="#">Inicio</a>
        <a href="#">Productos</a>
        <a href="#">Contacto</a>
      </nav>
    </header>

    <section class="hero">
      <div>
        <h2>Just Do It</h2>
        <p>Descubre el poder del deporte con Nike</p>
        <button class="btn">Comprar ahora</button>
      </div>
    </section>

    <section class="products">
      <div class="card">
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff">
        <h3>Air Max</h3>
        <p>$120</p>
      </div>

      <div class="card">
        <img src="https://images.unsplash.com/photo-1519741497674-611481863552">
        <h3>Jordan</h3>
        <p>$150</p>
      </div>

      <div class="card">
        <img src="https://images.unsplash.com/photo-1528701800489-20be3c3c7c1c">
        <h3>Runner</h3>
        <p>$100</p>
      </div>
    </section>

    <footer>
      <p>© 2026 Nike Clone - Todos los derechos reservados</p>
    </footer>

  </body>
  </html>
  `);
});

app.get("/pagos", (req, res) => {
  res.json([
    { id: 1, cliente_id: 1, monto: 100 },
    { id: 2, cliente_id: 2, monto: 250 }
  ]);
});

app.listen(3000, "0.0.0.0", () => {
  console.log("🔥 Servidor corriendo en http://localhost:3000");
});

