<%@ page language="java" contentType="text/html; charset=UTF-8" 
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
 <title>Acceso a datos: mostrar animales</title>
<meta charset='UTF-8'/>
</head>
<body>
<%@page errorPage="errores.jsp"%>
  <h2>Mostrar animales con JSP:</h2>
<%@ page import = "java.sql.*" %>
<%
Connection conn = null;
Statement sentencia = null;
// Paso 1: Cargar el driver JDBC.
Class.forName("org.mariadb.jdbc.Driver").newInstance();

// Paso 2: Conectarse a la Base de Datos utilizando la clase Connection
String userName = "alumno";
String password = "alumno";
String url = "jdbc:mariadb://localhost:3306/animales";
conn = DriverManager.getConnection(url, userName, password);
// Paso 3: Crear sentencias SQL, utilizando objetos de tipo Statement
sentencia = conn.createStatement();
// Paso 4: Ejecutar la sentencia SQL a través de los objetos Statement
String consulta = "SELECT * from animal";
ResultSet rset = sentencia.executeQuery(consulta);
%>
<hr>
<table>
	<tr style='background-color:lightblue'>
		<th>Nombre</th>
		<th>Especie</th>
	</tr>
<%
//Paso 5: Procesar el conjunto de registros resultante utilizando ResultSet
while (rset.next()) {
%>
 <tr>
  <td><%= rset.getString("nombre") %></td>
  <td><%= rset.getString("especie") %></td>
 </tr>
<% 
  } 
%>
 </table>
<%
  //Cierre de recursos
  rset.close();
  sentencia.close();
  conn.close();
%>
</body>
</html>
