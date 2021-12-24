package com.rafli.si_boss;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.toolbox.HttpResponse;
import com.android.volley.toolbox.StringRequest;
import com.rafli.si_boss.api.ApiClient;
import com.rafli.si_boss.api.ApiInterface;
import com.rafli.si_boss.model.update.UserModel;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class UpdateActivity extends AppCompatActivity {

    public Button BtnUbah, Btn_Ubah_Foto;
    public EditText EtNamaBiodata,EtNIK,EtEmailBiodata,EtPasswordBiodata,EtTempatLahirBiodata,EtTanggalLahirBiodata,EtNoHandphone,EtAlamat;
    public CheckBox CbShowPasswordBiodata;
    public TextView Tv13;
    private Object stricMode;
    public SessionManager sessionManager;

    private String nik_user, nama_user, tempat_lahir_user, tanggal_lahir_user, jenis_kelamin_user, alamat_user, no_hp_user, foto_user,
            email_user, password_user;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.update_biodata);
        sessionManager = new SessionManager(UpdateActivity.this);
        if(!sessionManager.isLoggedIn()){
//            moveToLogin();
        }

        BtnUbah = (Button) findViewById(R.id.BtnUbah);
        Btn_Ubah_Foto = (Button)findViewById(R.id.Btn_Ubah_Foto);
        EtNamaBiodata = (EditText) findViewById(R.id.EtNamaBiodata);
        EtNIK = (EditText) findViewById(R.id.EtNIK);
        EtEmailBiodata = (EditText) findViewById(R.id.EtEmailBiodata);
        EtPasswordBiodata = (EditText) findViewById(R.id.EtPasswordBiodata);
        EtTempatLahirBiodata = (EditText) findViewById(R.id.EtTempatLahirBiodata);
        EtTanggalLahirBiodata = (EditText) findViewById(R.id.EtTanggalLahirBiodata);
        EtNoHandphone = (EditText) findViewById(R.id.EtNoHandphone);
        EtAlamat = (EditText) findViewById(R.id.EtAlamat);
        Tv13 = (TextView) findViewById(R.id.Tv13);

        email_user = sessionManager.getUserDetail().get(SessionManager.EMAIL_USER);
        nama_user = sessionManager.getUserDetail().get(SessionManager.NAMA_USER);

        EtEmailBiodata.setText(email_user);
        EtNamaBiodata.setText(nama_user);

        getDetailAccount();

        Btn_Ubah_Foto.setOnClickListener(v -> {
            Intent intent = new Intent(Intent.ACTION_PICK);
            intent.setType("image/*");
            startActivityForResult(intent, 1);
        });
    }

//    private void moveToLogin() {
//        Intent intent = new Intent(UpdateActivity.this, LoginActivity.class);
//        intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK | Intent.FLAG_ACTIVITY_NO_HISTORY);
//        startActivity(intent);
//        finish();
//    }

    private void getDetailAccount() {
        ApiInterface apiInterface = ApiClient.getClient().create(ApiInterface.class);
        System.out.println(LoginActivity.email_user);
        Call<UserModel> call = apiInterface.getDataUser(LoginActivity.email_user);
        call.enqueue(new Callback<UserModel>() {
            @Override
            public void onResponse(Call<UserModel> call, Response<UserModel> response) {
                UserModel userModel = response.body();
                nik_user = userModel.getNik_user();
                nama_user = userModel.getNama_user();
                tempat_lahir_user = userModel.getTempat_lahir_user();
                tanggal_lahir_user = userModel.getTanggal_lahir_user();
                jenis_kelamin_user = userModel.getJenis_kelamin_user();
                alamat_user = userModel.getAlamat_user();
                no_hp_user = userModel.getNo_hp_user();
                foto_user = userModel.getFoto_user();
                email_user = userModel.getEmail_user();
                password_user = userModel.getPassword_user();
            }

            @Override
            public void onFailure(Call<UserModel> call, Throwable throwable) {

            }
        });
    }

}
