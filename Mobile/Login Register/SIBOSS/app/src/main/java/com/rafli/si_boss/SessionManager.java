package com.rafli.si_boss;

import android.content.Context;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;

import com.rafli.si_boss.model.login.LoginData;

import java.util.HashMap;

public class SessionManager {

    private Context _context;
    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;

    public static final String IS_LOGGED_IN = "isLoggedIn";
    public static final String EMAIL_USER ="email";
    public static final String NAMA_USER = "name";

    public SessionManager (Context context){
        this._context = context;
        sharedPreferences = PreferenceManager.getDefaultSharedPreferences(context);
        editor = sharedPreferences.edit();
    }

    public void createLoginSession(LoginData user){
        editor.putBoolean(IS_LOGGED_IN, true);
        editor.putString(EMAIL_USER, user.getEmailUser());
        editor.putString(NAMA_USER, user.getNamaUser());
        editor.commit();
    }

    public HashMap<String,String> getUserDetail(){
        HashMap<String,String> user = new HashMap<>();
        user.put(EMAIL_USER, sharedPreferences.getString(EMAIL_USER, null));
        user.put(NAMA_USER, sharedPreferences.getString(NAMA_USER, null));
        return user;
    }

    public void logoutSession(){
        editor.clear();
        editor.commit();
    }

    //    jika sudah login tidak perlu masuk ke login lagi
    public boolean isLoggedIn() {
        return sharedPreferences.getBoolean(IS_LOGGED_IN,false);
    }
}
