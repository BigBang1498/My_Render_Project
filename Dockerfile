# Se usa una imagen ligera de Nginx
FROM nginx:alpine

# Se copia todos los archivos al directorio donde Nginx busca la web
COPY . /usr/share/nginx/html

# Se expone el puerto 80
EXPOSE 80