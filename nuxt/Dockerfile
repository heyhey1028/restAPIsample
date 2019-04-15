FROM node:8.15.0-alpine
WORKDIR /app

RUN apk update && \
    apk add git && \
    npm install -g npm && \
    npm install -g @vue/cli && \
    npm install -g @vue/cli-init && \
    npm install -g nuxt && \
    npm install -g @nuxtjs/vuetify && \
    npm install -g create-nuxt-app

ENV HOST 0.0.0.0
EXPOSE 3000

CMD ["/bin/ash"]