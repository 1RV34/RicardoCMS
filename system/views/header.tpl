<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>{if $title}{$title} - {/if}{$_website_name}</title>
{$cssjs}
	</head>
	<body>
		<div class="header">
			<div class="header-wrapper">
				<div class="header-content">
					<a href="{$_base_uri}"><h1>{$_website_name}</h1></a>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="content">
{if $title}
				<h2>{$title}</h2>
{/if}
