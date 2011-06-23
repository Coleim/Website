<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<xsl:output 
		method="html" 
		encoding="ISO-8859-1"
		indent="yes"/>
		
		
	<xsl:template match="article">
		<div class="article">
			<div class="title">
				<xsl:value-of select="@title" />
				<xsl:text> - </xsl:text>
				<xsl:value-of select="@date" />
			</div>
			<div class="content">
				<xsl:value-of select="." />
			</div>
		</div>
	</xsl:template>
				
</xsl:stylesheet>