<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<xsl:output 
		method="html" 
		encoding="ISO-8859-1"
		indent="yes"/>

	<xsl:template match="header">
		<head>
			<xsl:text><!-- header of the website --></xsl:text>
			<xsl:apply-templates select="title"/>
			<xsl:apply-templates select="styleSheet"/>
			<xsl:apply-templates select="alternateStyleSheets"/>
			<xsl:apply-templates select="otherStyleSheets"/>
			
			<xsl:apply-templates select="author"/>
			<xsl:apply-templates select="publisher"/>
			<xsl:apply-templates select="description"/>
			<xsl:apply-templates select="url"/>
			<xsl:apply-templates select="contentType"/>
			<xsl:apply-templates select="keyWords"/>
			<meta name="Robots" content="Index, Follow, freesurvey"/>
			<meta name="Revisit-after" content="15"/>
		</head>
	</xsl:template>
		

	<xsl:template match="title">
		<title>
			<xsl:value-of select="." />
		</title>
	</xsl:template>
	
	<xsl:template match="styleSheet">
		<link>
			<xsl:attribute name="rel">
				<xsl:text>stylesheet</xsl:text>
			</xsl:attribute>	
			<xsl:attribute name="media">
				<xsl:text>screen, print, handheld</xsl:text>
			</xsl:attribute>
			<xsl:attribute name="type">
				<xsl:text>text/css</xsl:text>
			</xsl:attribute>
			<xsl:attribute name="title">
				<xsl:text>Default</xsl:text>
			</xsl:attribute>
			<xsl:attribute name="href">
				<xsl:text>../../css/</xsl:text>
				<xsl:value-of select="." />
				<xsl:text>.css</xsl:text>
			</xsl:attribute>
		</link>
	</xsl:template>	
	
	<xsl:template match="alternateStyleSheets">
		<xsl:for-each select="styleSheet">
			<link>
				<xsl:attribute name="rel">
					<xsl:text>alternate stylesheet</xsl:text>
				</xsl:attribute>	
				<xsl:attribute name="media">
					<xsl:text>screen, print, handheld</xsl:text>
				</xsl:attribute>
				<xsl:attribute name="type">
					<xsl:text>text/css</xsl:text>
				</xsl:attribute>
				<xsl:attribute name="title">
					<xsl:value-of select="." />
				</xsl:attribute>
				<xsl:attribute name="href">
					<xsl:text>../../css/</xsl:text>
					<xsl:value-of select="." />
					<xsl:text>.css</xsl:text>
				</xsl:attribute>
			</link>		
		</xsl:for-each>
	</xsl:template>
	

	<xsl:template match="otherStyleSheets">
		<xsl:for-each select="styleSheet">
			<link>
				<xsl:attribute name="rel">
					<xsl:text>stylesheet</xsl:text>
				</xsl:attribute>	
				<xsl:attribute name="media">
					<xsl:text>screen, print, handheld</xsl:text>
				</xsl:attribute>
				<xsl:attribute name="type">
					<xsl:text>text/css</xsl:text>
				</xsl:attribute>
				<xsl:attribute name="href">
					<xsl:text>../../css/</xsl:text>
					<xsl:value-of select="." />
					<xsl:text>.css</xsl:text>
				</xsl:attribute>
			</link>		
		</xsl:for-each>
	</xsl:template>

	<xsl:template match="author">
		<meta>
			<xsl:attribute name="name">
				<xsl:text>Author</xsl:text>
			</xsl:attribute>	
			<xsl:attribute name="content">
				<xsl:value-of select="." />
			</xsl:attribute>
		</meta>
	</xsl:template>
	
	<xsl:template match="publisher">
		<meta>
			<xsl:attribute name="name">
				<xsl:text>Publisher</xsl:text>
			</xsl:attribute>	
			<xsl:attribute name="content">
				<xsl:value-of select="." />
			</xsl:attribute>
		</meta>
	</xsl:template>
	
	<xsl:template match="description">
		<meta>
			<xsl:attribute name="name">
				<xsl:text>Description</xsl:text>
			</xsl:attribute>	
			<xsl:attribute name="content">
				<xsl:value-of select="." />
			</xsl:attribute>
		</meta>
	</xsl:template>
	
	
	<xsl:template match="url">
		<meta>
			<xsl:attribute name="name">
				<xsl:text>Indentifier-URL</xsl:text>
			</xsl:attribute>	
			<xsl:attribute name="content">
				<xsl:value-of select="." />
			</xsl:attribute>
		</meta>
	</xsl:template>
	
	<xsl:template match="contentType">
		<meta>
			<xsl:attribute name="name">
				<xsl:text>Content-Type</xsl:text>
			</xsl:attribute>	
			<xsl:attribute name="content">
				<xsl:value-of select="." />
			</xsl:attribute>
		</meta>
	</xsl:template>
	
	<xsl:template match="keyWords">
		<meta>
			<xsl:attribute name="name">
				<xsl:text>Keywords</xsl:text>
			</xsl:attribute>	
			<xsl:attribute name="content">
				<xsl:for-each select="keyWord">
					<xsl:value-of select="." />
					<xsl:text>, </xsl:text>
				</xsl:for-each>
			</xsl:attribute>
		</meta>
	</xsl:template>	
	
	
</xsl:stylesheet>
