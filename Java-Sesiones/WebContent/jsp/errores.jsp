 <%@ page language="java" contentType="text/html; charset=UTF-8" 
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
  <head>
    <title>Página de error JSP</title>
    <meta charset='UTF-8'/>
  </head>
   <body >
    <%@page isErrorPage="true"%>
    <h1>Página de errores en JSP</h1>
    <h3>Se ha producido el siguiente error:</h3>
    <h4><%=exception%></h4>
    <p>La descripción del error que ha ocurrido es: 
    <% exception.printStackTrace(new java.io.PrintWriter(out)); %>
    </p>
    </body>
</html>