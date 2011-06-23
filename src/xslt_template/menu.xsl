<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<xsl:output 
		method="html" 
		encoding="ISO-8859-1"
		indent="yes"/>

	<xsl:template match="menu">
		<div id="menu">
			<ul id="tabs">
				<xsl:apply-templates select="menuItem"/>
			</ul>
		</div>
	</xsl:template>

	<xsl:template match="menuItem">
		<li>
			<a>
				<xsl:attribute name="href">
					<xsl:text>index.php?page=</xsl:text>
					<xsl:value-of select="@link"/>
				</xsl:attribute>
				<xsl:value-of select="@name"/>
			</a>
		</li>
	</xsl:template>

</xsl:stylesheet>
