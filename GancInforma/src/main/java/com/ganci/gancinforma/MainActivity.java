package com.ganci.gancinforma;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.view.View;
import android.support.v4.view.GravityCompat;
import android.support.v7.app.ActionBarDrawerToggle;
import android.view.MenuItem;
import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;

import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        FloatingActionButton fab = findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Per info contattare @Kirito_SwArOn su telegram", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });
        DrawerLayout drawer = findViewById(R.id.drawer_layout);
        NavigationView navigationView = findViewById(R.id.nav_view);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();
        navigationView.setNavigationItemSelectedListener(this);

        WebView myWebView = (WebView) findViewById(R.id.web);
        myWebView.loadUrl("https://www.ganciproduction.altervista.org/covid/avv.php");
        myWebView.setWebViewClient(new MyWebViewClient());
        WebSettings webSettings = myWebView.getSettings();
        webSettings.setJavaScriptEnabled(true);

    }


    private class MyWebViewClient extends WebViewClient {
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            if ("www.example.com".equals(Uri.parse(url).getHost())) {
                // This is my website, so do not override; let my WebView load the page
                return false;
            }
            // Otherwise, the link is not for a page on my site, so launch another Activity that handles URLs
            Intent intent = new Intent(Intent.ACTION_VIEW, Uri.parse(url));
            startActivity(intent);
            return true;
        }
    }


    @Override
    public void onBackPressed() {
        WebView myWebView = (WebView) findViewById(R.id.web);
        DrawerLayout drawer = findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else if(myWebView.getUrl().equals("https://www.ganciproduction.altervista.org/covid/avv.php")) {
            super.onBackPressed();
        } else {
            myWebView.loadUrl("https://www.ganciproduction.altervista.org/covid/avv.php");
        }
    }

    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        WebView myWebView = (WebView) findViewById(R.id.web);
        // Handle navigation view item clicks here.
        int id = item.getItemId();
        if (id == R.id.nav_numeri) {
            myWebView.loadUrl("https://www.ganciproduction.altervista.org/covid/num.php");
            // Handle the camera action
        } else if (id == R.id.nav_condizioni) {
            myWebView.loadUrl("https://www.ganciproduction.altervista.org/covid/cond.php");
        } else if (id == R.id.nav_ripartizione) {
            myWebView.loadUrl("https://www.ganciproduction.altervista.org/covid/ripa.php");
        }
        DrawerLayout drawer = findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
