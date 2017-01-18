###### *Desarrollo Web en Entorno Servidor - Curso 2016/2017 - IES Leonardo Da Vinci - Alberto Ruiz*
## U4A02 - Acceso a archivos en JavaEE
#### Entrega de: *pon aquí tu nombre*
----
#### 1. Descripción:

Estudiaremos la lectura, escritura y borrado de archivos al servidor en JavaEE

#### 2. Formato de entrega:

Incluye en este u otro documento capturas que documenten tu trabajo.

#### 3. Trabajo a realizar:

##### Parte 1: Gestión de archivos con Java

* Crea un nuevo proyecto web dinámico llamado Java00-Archivos, siendo 00 tu número de equipo
* Crea una carpeta *files* dentro de la carpeta *WebContent*: nos acostumbraremos a crear siempre una carpeta con este nombre cuando manejemos archivos.
* Crea en la carpeta *files* un archivo *modulos.txt* en el que escribas los módulos en los que estás matriculado (un módulo por línea)
* Crea un servlet para manipular archivos en el que irás haciendo pruebas de lectura y escritura (incluye captura del resultado para cada prueba).
* Averigua la ruta real en la que se encuentra el archivo con el que vamos a trabajar:

```java
ServletContext contexto = getServletContext();
PrintWriter out = response.getWriter();
out.println(contexto.getRealPath("/files/modulos.txt"));
```
* Localiza en el explorador de archivos la ruta en la que Eclipse está desplegando las aplicaciones web JavaEE dentro del sistema de archivos de tu ordenador. Añádela a los accesos rápidos del explorador, puesto que acudiremos aquí a menudo para comprobar los efectos de las aplicaciones. Es importante que entiendas que los archivos no se modificarán en tu *workspace*, sino en este directorio de despliegue.
* La siguiente solución para leer un archivo es perfectamente válida y funcional en todas las versiones de Java: pruébala. Recuerda incluir capturas de cada ejecución, y comprueba siempre los resultados en el explorador de archivos.

```java
String ruta = contexto.getRealPath("/files/modulos.txt");
BufferedReader br = new BufferedReader(new InputStreamReader(
        new FileInputStream(ruta), "UTF-8"));
String linea;
while((linea = br.readLine()) != null)
   out.println(linea + "<br/>");
br.close();
```

* Prueba ahora la escritura y comprueba si se mantiene el contenido del archivo original:

```java
String ruta = contexto.getRealPath("/files/modulos.txt");
BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(
	    new FileOutputStream(ruta), "UTF-8"));
bw.write("Lenguajes de marcas\n");
bw.write("Entornos de desarrollo\n");
bw.close();
```
* Realiza la misma prueba cambiando el método de BufferedWriter `write` por `append`. ¿Cambia algo?
* El constructor de la clase `OutputStreamWriter` puede recibir un segundo parámetro booleano indicando que queremos realizar *append*. Sólo así tendrá efecto:
```java
String ruta = contexto.getRealPath("/files/modulos.txt");
BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(
      new FileOutputStream(ruta,true), "UTF-8"));
bw.write("¿He podido añadir esta línea? Contiene UTF-8\n");
bw.close();
```
* A continuación crearemos un nuevo archivo (comprueba el directorio):
```java
String ruta = contexto.getRealPath("/files/nuevo.txt");
File archivo = new File(ruta);
archivo.createNewFile();
```
* Y ahora lo eliminaremos:
```java
String ruta = contexto.getRealPath("/files/nuevo.txt");
File archivo = new File(ruta);
archivo.delete();
```

##### Parte 2: Gestión de archivos con Java 8

Veremos esta parte en enero.


##### Parte 3: Gestor de nombres
Repite la aplicación web que hicimos en la práctica anterior utilizando en este caso JavaEE:

Codifica una aplicación web que funcione de la siguiente forma:
- Habrá un archivo para almacenar nombres de persona. El archivo estará inicialmente vacío
- Se mostrarán dos cosas en pantalla:
  - La lista de nombres (sacada del archivo) ordenada alfabéticamente. Si está vacía, se mostrará un mensaje indicándolo
  - Un formulario con un campo de texto para introducir un nombre, y un botón de tipo radio para escoger *añadir* o *borrar*
- Se irán añadiendo o borrando nombres del archivo. Se mostrará un error si se intenta añadir un nombre que ya existe, o borrar un nombre que no existe.
