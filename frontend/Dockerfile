FROM node:lts-gallium

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . ./app

EXPOSE 8080

CMD ["npm", "run", "serve"]
