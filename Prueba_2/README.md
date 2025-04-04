# Ejercicio 2

---

Este ejercicio está desarrollado usando MySQL y PHP.

El programa solicitará un usuario administrador con el que se conectará a la base de datos.

Una vez logueado, el administrador podrá ver la lista de usuarios de la aplicación, así como una vista detallada en la que podrá comprobar los permisos con los que cuenta el usuario seleccionado. También podrá eliminar ususarios y crear nuevos.

El usuario administrador es:

- usuario = admin
- contraseña = 1234

## Despliegue

Para facilitar el despliegue, el programa está contenido en un docker, por lo que para desplegarlo solo habrá que ejecutar en la carpeta del ejercicio:

```bash
docker-compose up -d
```

El programa será accesible desde la ruta **localhost:8080**
