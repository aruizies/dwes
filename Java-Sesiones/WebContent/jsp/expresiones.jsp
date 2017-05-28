<%@ page language="java" contentType="text/html; charset=UTF-8" 
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
  <head>
    <title>Expresiones JSP</title>
    <meta charset='UTF-8'/>
  </head>
<%-- Esto en un comentario de JSP --%>
<body>
  <h1>Ejemplo de expresiones JSP</H1>
  <ul>
	<li>Fecha actual: <%=new java.util.Date()%>
	<li>Nombre del host: <%=request.getRemoteHost()%>
	<li>ID de la sesión: <%=session.getId()%>
	<li>El parámetro es: <%=request.getParameter("nombre")%>
  </ul>
</body>
</html>