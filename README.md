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



//////////Estructura del proyecto//////////////

/app → Código PHP
/models → Capa de acceso a datos
/views → Vistas
/config → Conexiones a base de datos
/docker-compose.yml → Configuración de contenedores