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
import com.rafli.si_boss.model.register.Register;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class RegisterActivity extends AppCompatActivity implements View.OnClickListener {
    EditText EtEmailDaftar, EtNamaLengkapDaftar, EtPasswordDaftar, EtNIKDaftar;
    CheckBox CbShowPasswordRegister;
    Button BtnDaftar;
    TextView TvLogin;
    String Nik, Email, Password, Name;
    ApiInterface apiInterface;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.sign_up);

        EtNIKDaftar = findViewById(R.id.EtNIKDaftar);
        EtEmailDaftar = findViewById(R.id.EtEmailDaftar);
        EtPasswordDaftar = findViewById(R.id.EtPasswordDaftar);
        EtNamaLengkapDaftar = findViewById(R.id.EtNamaLengkapDaftar);

        CbShowPasswordRegister = findViewById(R.id.CbShowPasswordRegister);

        BtnDaftar = findViewById(R.id.BtnDaftar);
        BtnDaftar.setOnClickListener(this);

        TvLogin = findViewById(R.id.TvLogin);
        TvLogin.setOnClickListener(this);

//        Show/Hide password
        CbShowPasswordRegister.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {
                if (b){
                    EtPasswordDaftar.setTransformationMethod(HideReturnsTransformationMethod.getInstance());
                } else {
                    EtPasswordDaftar.setTransformationMethod(PasswordTransformationMethod.getInstance());
                }

            }
        });
    }


    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.BtnDaftar:
                Nik = EtNIKDaftar.getText().toString();
                Email = EtEmailDaftar.getText().toString();
                Password = EtPasswordDaftar.getText().toString();
                Name = EtNamaLengkapDaftar.getText().toString();
                register(Nik, Email, Password, Name);
                break;
            case R.id.TvLogin:
                Intent intent = new Intent(this, LoginActivity.class);
                startActivity(intent);
                finish();
                break;
        }
    }

    private void register(String nik, String email, String password, String name) {

        apiInterface = ApiClient.getClient().create(ApiInterface.class);
        Call<Register> call = apiInterface.registerResponse(nik, email, password, name);
        call.enqueue(new Callback<Register>() {
            @Override
            public void onResponse(Call<Register> call, Response<Register> response) {
                if (response.body() != null && response.isSuccessful() && response.body().isStatus()){
                    Toast.makeText( RegisterActivity.this, response.body().getMessage(), Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(RegisterActivity.this, LoginActivity.class);
                    startActivity(intent);
                    finish();
                } else {
                    Toast.makeText(RegisterActivity.this, response.body().getMessage(), Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<Register> call, Throwable t) {
                Toast.makeText(RegisterActivity.this, t.getLocalizedMessage(), Toast.LENGTH_SHORT).show();
            }
        });


    }
}
