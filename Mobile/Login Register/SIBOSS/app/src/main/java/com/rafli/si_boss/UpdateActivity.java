package com.rafli.si_boss;

import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.toolbox.HttpResponse;

public class UpdateActivity extends AppCompatActivity {

    Button BtnUbah;
    EditText EtNamaBiodata,EtNIK,EtEmailBiodata,EtPasswordBiodata,EtTempatLahirBiodata,EtTanggalLahirBiodata,EtNoHandphone,EtAlamat;
    CheckBox CbShowPasswordBiodata;
    TextView Tv13;
    private Object stricMode;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.update_biodata);

        BtnUbah = (Button) findViewById(R.id.BtnUbah);
        EtNamaBiodata = (EditText) findViewById(R.id.EtNamaBiodata);
        EtNIK = (EditText) findViewById(R.id.EtNIK);
        EtEmailBiodata = (EditText) findViewById(R.id.EtEmailBiodata);
        EtPasswordBiodata = (EditText) findViewById(R.id.EtPasswordBiodata);
        EtTempatLahirBiodata = (EditText) findViewById(R.id.EtTempatLahirBiodata);
        EtTanggalLahirBiodata = (EditText) findViewById(R.id.EtTanggalLahirBiodata);
        EtNoHandphone = (EditText) findViewById(R.id.EtNoHandphone);
        EtAlamat = (EditText) findViewById(R.id.EtAlamat);
        Tv13 = (TextView) findViewById(R.id.Tv13);
        stricMode.enebleDefault();

        BtnUbah.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                try {
                    String NamaBiodata = EtNamaBiodata.getText().toString();
                    String NIK = EtNIK.getText().toString();
                    String EmailBiodata = EtEmailBiodata.getText().toString();
                    String PasswordBiodata = EtPasswordBiodata.getText().toString();
                    String TempatLahirBiodata = EtTempatLahirBiodata.getText().toString();
                    String TanggalLahirBiodata = EtTanggalLahirBiodata.getText().toString();
                    String NoHandphone = EtNoHandphone.getText().toString();
                    String Alamat = EtAlamat.getText().toString();

                    HttpClient httpclient = new DefaultHttpClient();
                    HttpPost httppost = new HttpPost("http//192.168.1.9/si-boss/update.php?nama_user="+NamaBiodata+"&nik_user="+NIK);


                    HttpResponse response = httpclient.execute(httppost);
                    Toast.makeText(getApplicationContext(), "Update Data", Toast.LENGTH_LONG).show();
                    Log.e("pass 1","connection success");
                    Tv13.setText("NIK Update SuccessFully");
                } catch (Exception e) {
                    Log.e("Fail", e.toString());
                    Toast.makeText(getApplicationContext(),e.toString(),Toast.LENGTH_LONG).show();
                            
                }

            }
        });
    }
}
