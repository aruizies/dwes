<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<title>Gestión de errores en JSP</title>
<meta charset='UTF-8' />
</head>
<body>
	<%@page errorPage="errores.jsp"%>
	<h1>Ejemplo de manejo de errores en JSP</h1>
	<%!
		private double toDouble(String value) {
			return (Double.valueOf(value).doubleValue());
		}
	%>
	<%
		double op1 = toDouble(request.getParameter("op1"));
		double op2 = toDouble(request.getParameter("op2"));
		double res = op1 / op2;
	%>
	<table border=1>
		<tr>
			<th></th>
			<th>División</th>
		</tr>
		<tr>
			<th>Operando 1:</th>
			<td><%=op1%></td>
		</tr>
		<tr>
			<th>Operando 2:</th>
			<td><%=op2%></td>
		</tr>
		<tr>
			<th>Resultado:</th>
			<td><%=res%></td>
		</tr>
	</table>
</body>
</html>