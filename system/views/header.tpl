<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>{if $title}{$title} - {/if}{$_websiteName}</title>
{$cssjs}
	</head>
	<body>
		<div class="header">
			<div class="header-wrapper">
				<div class="header-content">
					<a href="{$_baseUri}"><h1>{$_websiteName}</h1></a>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="content">
{if $title}
				<h2>{$title}</h2>
{/if}
