Notes:

When using emoji filter in Twig, for example:
{{ content | emoji }} the escaping of input is ommited. 

Make sure to add escape filter additionally.
{{ content | e | emoji  }} 