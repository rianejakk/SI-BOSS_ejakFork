package com.rafli.si_boss.api;

import com.rafli.si_boss.Bus;
import com.rafli.si_boss.model.login.Login;
import com.rafli.si_boss.model.register.Register;
import com.rafli.si_boss.model.update.UserModel;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;
import retrofit2.http.Query;

public interface ApiInterface {

    @FormUrlEncoded
    @POST("login.php")
    Call<Login> loginResponse(
            @Field("email_user") String email,
            @Field("password_user") String password
    );

    @FormUrlEncoded
    @POST("user.php")
    Call<UserModel> getDataUser(@Field("email_user") String email_user);

    @FormUrlEncoded
    @POST("register.php")
    Call<Register> registerResponse(
            @Field("nik_user") String nik,
            @Field("email_user") String email,
            @Field("password_user") String password,
            @Field("nama_user") String name
    );

    @GET("Api.php")
    Call<List<Bus>> getBusFromDB(
            @Query("nama_bus") String nama_bus,
            @Query("harga") String harga
    );
}
