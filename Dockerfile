FROM node:9-alphine

RUN mkdir /app
WORKDIR /app

COPY package.json /app
COPY bower.json /app

RUN npm install

COPY . /app

EXPOSE 4000

CMD [ "npm", "start" ]
