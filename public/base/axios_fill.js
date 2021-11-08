let ds = { nama: "Bengkel Caca" };
axios
    .post(r_test_bearer, ds, {
        headers: {
            Authorization: "Bearer l0XcaMCkiBD3m5cVh3rYXUmWWwDfhDD1FPTOfpcN",
        },
    })
    .then(function (res) {
        console.log(res.data);
    });
