<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
  <head>
    <title>Scriptlets JSP</title>
    <meta charset='UTF-8'/>
  </head>
<%@page import="java.util.*"%>
<%!	private int cont = 0;
	private Date fecha = new Date(); 
%>
<body>
	<p>
		Esta página ha sido accedida <b><%=++cont%></b> veces desde que se
		inició el servidor.
	</p>
	<p>
		El último acceso ha sido con fecha <b><%=fecha%></b>
	</p>
	<%	fecha = new Date(); 
	%>
</body>
</html>