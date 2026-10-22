# 1. Install Node.js and NPM inside the container
RUN curl -sL https://nodesource.com | bash - && \
    apt-get install -y nodejs

# 2. Set the working directory
WORKDIR /var/www

# 3. Copy package files and install front-end dependencies
COPY package*.json ./
RUN npm install

# 4. Copy the rest of your application code
COPY . .

# 5. Compile CSS and JS assets using Vite
RUN npm run build

# Ensure correct permissions for the newly generated build folder
RUN chown -R www-data:www-data /var/www/public/build
