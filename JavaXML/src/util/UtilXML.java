package util;

import java.io.FileInputStream;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;

import org.w3c.dom.Document;

public class UtilXML {

	public static Document abrirDocumentoXML(String ruta) {

		// Paso 1: inicializar el parser
		DocumentBuilderFactory builderFactory = DocumentBuilderFactory.newInstance();
		DocumentBuilder builder = null;
		try {
			builder = builderFactory.newDocumentBuilder();
		} catch (Exception e) {
			System.out.println("Error al crear el parser XML");
			return null;
		}

		// Paso 2: procesar un archivo
		try {
			Document documento = builder.parse(new FileInputStream(ruta));
			return documento;
		} catch (Exception e) {
			System.out.println("Error al procesar el archivo XML " + ruta);
			return null;
		}

	}

}
