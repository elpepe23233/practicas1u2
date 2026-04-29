# practicas1u2
Sistema de cobros

La app funciona a la perfección, se encuentra todos los contendores

Tecnologías utilizadas
PHP 8.3
Nginx
MySQL
PostgreSQL
Docker


Clientes → MySQL
Cobros → PostgreSQL

Pasos para ejecutar:
-Clonar repositorio. git clone https://github.com/elpepe23233/practicas1u2
-Entrar al proyecto: "cd miproyecto"
-Levantar contenedores: docker-compose up -d o "docker-compose up -d --build" para construir. y vemos contenedores corriendo con docker ps
Finalmente abrimos nuestor navegador con "http://localhost:8080"


<img width="1197" height="547" alt="image" src="https://github.com/user-attachments/assets/cbcb0a88-db0b-449d-8334-8507de035b00" />

//////////Estructura del proyecto//////////////

/app → Código PHP
/models → Capa de acceso a datos
/views → Vistas
/config → Conexiones a base de datos
/docker-compose.yml → Configuración de contenedores

<img width="1302" height="619" alt="image" src="https://github.com/user-attachments/assets/48903d42-1c1a-466b-ac26-81c46c92efb4" />
