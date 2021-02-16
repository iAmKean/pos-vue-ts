module.exports = {
  publicPath:
    process.env.NODE_ENV === "production" ? "/pos-vue-ts/" : "/", // local

  devServer: {
    proxy: "http://localhost/pos-vue-ts-server"
  }
};
