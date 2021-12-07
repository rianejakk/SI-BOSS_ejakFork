package com.rafli.si_boss.api;

import com.rafli.si_boss.model.login.Login;
import com.rafli.si_boss.model.register.Register;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface ApiInterface {

    @FormUrlEncoded
    @POST("login.php")
    Call<Login> loginResponse(
            @Field("email") String email,
            @Field("password") String password
    );

    @FormUrlEncoded
    @POST("register.php")
    Call<Register> registerResponse(
            @Field("email") String email,
            @Field("password") String password,
            @Field("name") String name
    );
}
