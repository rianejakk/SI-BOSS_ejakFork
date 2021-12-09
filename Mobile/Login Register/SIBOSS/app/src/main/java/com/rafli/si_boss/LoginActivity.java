package com.rafli.si_boss;

import android.content.Intent;
import android.os.Bundle;
import android.text.method.HideReturnsTransformationMethod;
import android.text.method.PasswordTransformationMethod;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.rafli.si_boss.api.ApiClient;
import com.rafli.si_boss.api.ApiInterface;
import com.rafli.si_boss.model.login.Login;
import com.rafli.si_boss.model.login.LoginData;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity implements View.OnClickListener{

    EditText EtEmailLogin, EtPasswordLogin;
    Button BtnLogin;
    CheckBox CbShowPasswordLogin;
    String Email, Password;
    TextView TvRegister;
    ApiInterface apiInterface;
    SessionManager sessionManager;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        EtEmailLogin = findViewById(R.id.EtEmailLogin);
        EtPasswordLogin = findViewById(R.id.EtPasswordLogin);

        CbShowPasswordLogin = findViewById(R.id.CbShowPasswordLogin);

        BtnLogin = findViewById(R.id.BtnLogin);
        BtnLogin.setOnClickListener(this);

        TvRegister = findViewById(R.id.TvDaftar);
        TvRegister.setOnClickListener(this);

        //        Show/Hide password
        CbShowPasswordLogin.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {
                if (b){
                    EtPasswordLogin.setTransformationMethod(HideReturnsTransformationMethod.getInstance());
                } else {
                    EtPasswordLogin.setTransformationMethod(PasswordTransformationMethod.getInstance());
                }

            }
        });
    }
//ketika di click pindah halaman lain
    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.BtnLogin:
                Email = EtEmailLogin.getText().toString();
                Password = EtPasswordLogin.getText().toString();
                login(Email, Password);
                break;
            case R.id.TvDaftar:
                Intent intent = new Intent(this, RegisterActivity.class);
                startActivity(intent);
                break;
        }
    }

    private void login(String email, String password) {

        apiInterface = ApiClient.getClient().create(ApiInterface.class);
        Call<Login> loginCall = apiInterface.loginResponse(email, password);
        loginCall.enqueue(new Callback<Login>() {
            @Override
            public void onResponse(Call<Login> call, Response<Login> response) {
                if (response.body() != null && response.isSuccessful() && response.body().isStatus()){

                    sessionManager = new SessionManager(LoginActivity.this);
                    LoginData loginData = response.body().getLoginData();
                    sessionManager.createLoginSession(loginData);


                    Toast.makeText(LoginActivity.this, response.body().getLoginData().getName(), Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(LoginActivity.this, MainActivity.class);
                    startActivity(intent);
                    finish();
                } else {
                    Toast.makeText(LoginActivity.this, response.body().getMessage(), Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<Login> call, Throwable t) {
                Toast.makeText(LoginActivity.this, t.getLocalizedMessage(), Toast.LENGTH_SHORT).show();
            }
        });

    }
}
