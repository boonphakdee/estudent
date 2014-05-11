{% for item in items %}
<li> {{ item.name|e }}</li>
{% endfor %}