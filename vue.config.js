module.exports = {
  publicPath:
    process.env.NODE_ENV === "production" ? "/pos-vue-web/" : "/", // local

  devServer: {
    proxy: "http://localhost/pos-vue-server"
  }
};
