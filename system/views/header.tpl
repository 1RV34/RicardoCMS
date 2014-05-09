<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>{$title}</title>
		<script type="text/javascript">
			var ricardoCMSData={$javaScriptData};
		</script>
{$cssJs}
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
{if $pageName}
				<h2>{$pageName}</h2>
{/if}
