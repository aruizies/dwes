###### *Desarrollo Web en Entorno Servidor - Curso 2016/2017 - IES Leonardo Da Vinci - Alberto Ruiz*
## U4A03 - Actividades de repaso
#### Entrega de: *pon aquí tu nombre*
----
#### 1. Descripción:

El objetivo es resolver problemas sencillos en PHP y Java para recuperar el ritmo después de las vacaciones.

#### 2. Formato de entrega:

Incluye en este u otro documento capturas que documenten tu trabajo y el código de tus programas.

#### 3. Trabajo a realizar:

#### Parte 1: Problemas sin archivos

Codifica estos tres problemas. Elige entre Java y PHP, pero sin escoger la misma plataforma para los tres.

La etiqueta `<pre>` te permitirá lograr un tipo de letra de ancho fijo y que se respeten los espacios en blanco que escribas. Para indicar un salto de línea dentro de la etiqueta `<pre>` puedes utilizar `<br/>` de la forma habitual.

Fuera de elementos `<pre>`, la entidad `&nbsp;` imprimirá un espacio en blanco.


###### Problema 1

Pedir por formulario un número X y mostrar una pirámide de números con marco. Por ejemplo, para X=5:

```
/-----\
|1    |
|12   |
|123  |
|1234 |
|12345|
\-----/
```

###### Problema 2

El usuario introducirá un número X y un texto mediante un formulario. La aplicación escribirá el texto tras una flecha del tamaño indicado por X. Por ejemplo, para X=4 y texto="Esto es un ejemplo", el resultado sería:

```
|\
| \
|  \
|   \
|    > Esto es un ejemplo
|   /
|  /
| /
|/
```
En este caso hay 4 espacios en la línea central entre los símbolos | y >

###### Problema 3

Dado un número X, mostrar una tabla cuadrada con números de forma que cada número siempre esté en una celda contigua al número anterior, y las filas se distingan con colores de fondo diferentes.
Por ejemplo, para X=5 (ignorar la negrita, es una limitación de MarkDown):

|1|2|3|4|5|
|:---:|:---:|:---:|:---:|:---:|
|10|9|8|7|6|
|11|12|13|14|15|
|20|19|18|17|16|
|21|22|23|24|25|

#### Parte 2: Problemas con archivos

Codifica estos dos problemas, uno en Java y otro en PHP (a tu elección)

###### Problema 3

Vamos a gestionar un sistema sencillo de bloc de notas estilo post-it.

El sistema leerá las notas de un archivo y las mostrará con el siguiente formato (puedes mejorarlo si lo deseas):
```
 ___________________________
/                           \
|  sacar a pasear al perro  |
|       comprar leche       |
|       estudiar php        |  
\___________________________/
```

Observa que el ancho del post-it tiene un margen de dos caracteres respecto a la nota más larga (tendrás que averiguar cuál es antes de dibujar)

Después de mostrar las notas se incluirá un formulario para añadir nuevas notas. No se admitirán más de 50 caracteres, ni tampoco notas repetidas.

###### Problema 4

Programa un sencillo juego en el que se irán introduciendo números X entre 1 y 50 a través de un formulario. Cada vez que se introduzca uno, en pantalla se mostrará el número de valores introducidos hasta el momento, por ejemplo:

```
Has introducido 5 números.
```

En el momento en que se introduzca un número repetido, se mostrarán todos:

```
¡Ya habías introducido el número 41 antes! Has logrado escribir 5 números sin repetirte: 48 41 29 10 2
```

En ese momento se reinicia el juego, es decir, el siguiente número introducido será el primero.

Los números fuera de rango se ignoran (no se muestra nada ni se tienen en cuenta). Debes utilizar arrays y archivos para solucionar este problema.
