<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<title>Scriptlets JSP</title>
<meta charset='UTF-8' />
<%
	String bgColor = request.getParameter("bgColor");
	boolean hayColor;
	if (bgColor != null)
		hayColor = true;
	else {
		hayColor = false;
		bgColor = "white";
	}
%>
</head>
<body style="background-color:<%=bgColor%>">
	<h1>Ejemplo de scriptlets JSP</h1>
	<%
		if (hayColor)
			out.println("Se ha utilizado el color: " + bgColor);
		else
			out.println("Se ha utilizado el color por defecto: white");
	%>
</body>
</html>