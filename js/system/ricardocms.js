(function(w)
{
	w.ricardoCMS = {
		async: function(url)
		{
			$("<iframe></iframe>").attr(
			{
				seamless: "seamless",
				src: url
			}).hide().appendTo("body");
		},
		log: function(object, title)
		{
			if (title)
				console.log(title + ":");

			console.log(object);
			return object;
		}
	};
})(window);
